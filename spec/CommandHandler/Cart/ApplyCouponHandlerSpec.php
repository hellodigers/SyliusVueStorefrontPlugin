<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\CommandHandler\Cart;

use BitBag\SyliusVueStorefrontPlugin\Command\Cart\ApplyCoupon;
use BitBag\SyliusVueStorefrontPlugin\CommandHandler\Cart\ApplyCouponHandler;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PromotionCouponInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;
use Sylius\Component\Promotion\Checker\Eligibility\PromotionCouponEligibilityCheckerInterface;
use Sylius\Component\Promotion\Repository\PromotionCouponRepositoryInterface;

final class ApplyCouponHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ApplyCouponHandler::class);
    }

    function let(
        OrderRepositoryInterface $orderRepository,
        PromotionCouponRepositoryInterface $couponRepository,
        OrderProcessorInterface $orderProcessor,
        PromotionCouponEligibilityCheckerInterface $couponEligibilityChecker
    ): void {
        $this->beConstructedWith(
            $orderRepository,
            $couponRepository,
            $orderProcessor,
            $couponEligibilityChecker
        );
    }

    function it_applies_coupon(
        OrderInterface $cart,
        OrderRepository $orderRepository,
        PromotionCouponInterface $coupon,
        PromotionCouponRepositoryInterface $couponRepository,
        PromotionCouponEligibilityCheckerInterface $couponEligibilityChecker,
        OrderProcessorInterface $orderProcessor
    ): void {
        $applyCoupon = new ApplyCoupon('123', 'cart-id', 'coupon');

        $orderRepository->findOneBy(['tokenValue' => 'cart-id'])->willReturn($cart);
        $couponRepository->findOneBy(['code' => 'coupon'])->willReturn($coupon);

        $couponEligibilityChecker->isEligible($cart, $coupon)->willReturn(1);
        $cart->setPromotionCoupon($coupon)->shouldBeCalledOnce();

        $orderProcessor->process($cart)->shouldBeCalled();

        $this->__invoke($applyCoupon);
    }
}
