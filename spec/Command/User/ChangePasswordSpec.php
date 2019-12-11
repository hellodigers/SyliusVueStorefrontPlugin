<?php

/*
 * This file has been created by developers from BitBag.
 *  Feel free to contact us once you face any issues or want to start
 *  another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusVueStorefrontPlugin\Command\User;

use BitBag\SyliusVueStorefrontPlugin\Command\User\ChangePassword;
use PhpSpec\ObjectBehavior;

final class ChangePasswordSpec extends ObjectBehavior
{
    private const NEW_PASSWORD = 'sylius';

    public function let(): void
    {
        $this->beConstructedWith(
            self::NEW_PASSWORD
        );
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(ChangePassword::class);
    }

    function it_allows_access_via_properties(): void
    {
        $this->newPassword()->shouldReturn(self::NEW_PASSWORD);
    }
}
