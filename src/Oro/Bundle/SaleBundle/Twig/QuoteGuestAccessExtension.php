<?php

namespace Oro\Bundle\SaleBundle\Twig;

use Oro\Bundle\SaleBundle\Entity\Quote;
use Oro\Bundle\SaleBundle\Provider\GuestQuoteAccessProviderInterface;
use Oro\Bundle\WebsiteBundle\Resolver\WebsiteUrlResolver;
use Symfony\Component\DependencyInjection\ContainerInterface;

class QuoteGuestAccessExtension extends \Twig_Extension
{
    const NAME = 'oro_sale_quote_guest_access';

    /** @var ContainerInterface */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('quote_guest_access_link', [$this, 'getGuestAccessLink'])
        ];
    }

    /**
     * @param Quote $quote
     * @return string|null
     */
    public function getGuestAccessLink(Quote $quote): ?string
    {
        if (!$quote->getWebsite() || !$this->getGuestLinkAccessProvider()->isGranted($quote)) {
            return null;
        }

        return $this->getWebsiteUrlResolver()
            ->getWebsitePath(
                'oro_sale_quote_frontend_view_guest',
                ['guest_access_id' => $quote->getGuestAccessId()],
                $quote->getWebsite()
            );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return static::NAME;
    }

    /**
     * @return GuestQuoteAccessProviderInterface
     */
    private function getGuestLinkAccessProvider(): GuestQuoteAccessProviderInterface
    {
        return $this->container->get('oro_sale.provider.guest_quote_access.link');
    }

    /**
     * @return WebsiteUrlResolver
     */
    private function getWebsiteUrlResolver(): WebsiteUrlResolver
    {
        return $this->container->get('oro_website.resolver.website_url_resolver');
    }
}
