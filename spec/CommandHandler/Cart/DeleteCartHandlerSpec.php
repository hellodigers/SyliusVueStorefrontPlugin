<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\CommandHandler\Cart;

use BitBag\SyliusVueStorefrontPlugin\Command\Cart\DeleteCart;
use BitBag\SyliusVueStorefrontPlugin\CommandHandler\Cart\DeleteCartHandler;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface;

final class DeleteCartHandlerSpec extends ObjectBehavior
{
    public function let(OrderRepositoryInterface $cartRepository): void
    {
        $this->beConstructedWith($cartRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DeleteCartHandler::class);
    }

    public function it_deletes_cart(
        OrderRepositoryInterface $cartRepository,
        OrderInterface $cart
    ): void {
        $deleteCart = new DeleteCart('token', 'cart-id');

        $cart->getState()->willReturn(OrderInterface::STATE_CART);
        $cartRepository->findOneBy(['tokenValue' => $deleteCart->cartId()])->willReturn($cart);
        $cartRepository->remove($cart)->shouldBeCalled();

        $this->__invoke($deleteCart);
    }
}
