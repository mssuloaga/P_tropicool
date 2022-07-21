<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service\Entity;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Verify\V2\Service\Entity\Challenge\NotificationList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $entitySid
 * @property string $identity
 * @property string $factorSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property \DateTime $dateResponded
 * @property \DateTime $expirationDate
 * @property string $status
 * @property string $respondedReason
 * @property array $details
 * @property array $hiddenDetails
 * @property array $metadata
 * @property string $factorType
 * @property string $url
 * @property array $links
 */
class ChallengeInstance extends InstanceResource {
    protected $_notifications;

    /**
     * Initialize the ChallengeInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @param string $identity Unique external identifier of the Entity
     * @param string $sid A string that uniquely identifies this Challenge.
     */
    public function __construct(Version $version, array $payload, string $serviceSid, string $identity, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'entitySid' => Values::array_get($payload, 'entity_sid'),
            'identity' => Values::array_get($payload, 'identity'),
            'factorSid' => Values::array_get($payload, 'factor_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'dateResponded' => Deserialize::dateTime(Values::array_get($payload, 'date_responded')),
            'expirationDate' => Deserialize::dateTime(Values::array_get($payload, 'expiration_date')),
            'status' => Values::array_get($payload, 'status'),
            'respondedReason' => Values::array_get($payload, 'responded_reason'),
            'details' => Values::array_get($payload, 'details'),
            'hiddenDetails' => Values::array_get($payload, 'hidden_details'),
            'metadata' => Values::array_get($payload, 'metadata'),
            'factorType' => Values::array_get($payload, 'factor_type'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        ];

        $this->solution = [
            'serviceSid' => $serviceSid,
            'identity' => $identity,
            'sid' => $sid ?: $this->properties['sid'],
        ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ChallengeContext Context for this ChallengeInstance
     */
    protected function proxy(): ChallengeContext {
        if (!$this->context) {
            $this->context = new ChallengeContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['identity'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the ChallengeInstance
     *
     * @return ChallengeInstance Fetched ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ChallengeInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Update the ChallengeInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChallengeInstance Updated ChallengeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): ChallengeInstance {
        return $this->proxy()->update($options);
    }

    /**
     * Access the notifications
     */
    protected function getNotifications(): NotificationList {
        return $this->proxy()->notifications;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Verify.V2.ChallengeInstance ' . \implode(' ', $context) . ']';
    }
}