<?php

declare(strict_types=1);

namespace LauLamanApps\IzettleApi\API\Inventory\Settings;

use LauLamanApps\IzettleApi\API\Inventory\Settings\Exception\EmailAddressNotValidException;
use LauLamanApps\IzettleApi\API\Universal\iZettlePostable;

final class NotificationSettings implements iZettlePostable
{
    private $emailReceivers;
    private $notifyBelowBalance;
    private $interval;

    public function new(array $emailReceivers, int $notifyBelowBalance, Interval $interval): self
    {
        return new self($emailReceivers, $notifyBelowBalance, $interval);
    }

    public function create(array $emailReceivers, int $notifyBelowBalance, Interval $interval): self
    {
        return new self($emailReceivers, $notifyBelowBalance, $interval);
    }

    public function getEmailReceivers(): array
    {
        return $this->emailReceivers;
    }

    public function getNotifyBelowBalance(): int
    {
        return $this->notifyBelowBalance;
    }

    public function getInterval(): Interval
    {
        return $this->interval;
    }

    public function getPostData(): array
    {
        return [
            "emailReceivers" => $this->emailReceivers,
            "notifyBelowBalance"=> $this->notifyBelowBalance,
            "interval" => $this->interval->getValue()
        ];
    }

    private function __construct(array $emailReceivers, int $notifyBelowBalance, Interval $interval)
    {
        $this->emailReceivers = $emailReceivers;
        $this->notifyBelowBalance = $notifyBelowBalance;
        $this->interval = $interval;
        $this->validateEmailAddresses();
    }

    private function validateEmailAddresses(): void
    {
        foreach ($this->emailReceivers as $emailReceiver)
        {
            $this->validateEmailAddress($emailReceiver);
        }
    }

    private function validateEmailAddress($emailReceiver): void
    {
        if (!filter_var($emailReceiver, FILTER_VALIDATE_EMAIL)) {
         throw new EmailAddressNotValidException(sprintf('\'%s\' is not a valid email address', $emailReceiver));
        }
    }
}
