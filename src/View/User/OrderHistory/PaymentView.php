<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\View\User\OrderHistory;

final class PaymentView
{
    /** @var string|null */
    public $account_status;

    /** @var string[] */
    public $additional_information;

    /** @var float */
    public $amount_ordered;

    /** @var float */
    public $base_amount_ordered;

    /** @var float */
    public $base_shipping_amount;

    /** @var string|null */
    public $cc_last4;

    /** @var int */
    public $entity_id;

    /** @var string */
    public $method;

    /** @var string */
    public $parent_id;

    /** @var float */
    public $shipping_amount;
}