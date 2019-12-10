<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Request\Cart;

use BitBag\SyliusVueStorefrontPlugin\Model\Request\Cart\AddressInformation;
use Symfony\Component\HttpFoundation\Request;

final class SetShippingInformationRequest
{
    /** @var string|null */
    private $token;

    /** @var int|string */
    private $cartId;

    /** @var AddressInformation */
    private $addressInformation;

    public function __construct(Request $request)
    {
        $this->token = $request->query->get('token');
        $this->cartId = $request->query->get('cartId');
        $this->addressInformation = $request->request->get('addressInformation');
    }

    public static function fromHttpRequest(Request $request): self
    {
        return new self($request);
    }
}
