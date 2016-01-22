<?php

namespace OroB2B\Bundle\PricingBundle\Tests\Functional\Entity\Repository;

use Oro\Bundle\TestFrameworkBundle\Test\WebTestCase;

use OroB2B\Bundle\AccountBundle\Entity\Account;
use OroB2B\Bundle\AccountBundle\Entity\AccountGroup;
use OroB2B\Bundle\PricingBundle\Entity\PriceListAccountFallback;
use OroB2B\Bundle\PricingBundle\Entity\PriceListToAccount;
use OroB2B\Bundle\PricingBundle\Entity\Repository\PriceListToAccountRepository;
use OroB2B\Bundle\WebsiteBundle\Entity\Website;

/**
 * @dbIsolation
 */
class PriceListToAccountRepositoryTest extends WebTestCase
{
    protected function setUp()
    {
        $this->initClient([], $this->generateBasicAuthHeader());

        $this->loadFixtures(
            [
                'OroB2B\Bundle\PricingBundle\Tests\Functional\DataFixtures\LoadPriceListRelations',
                'OroB2B\Bundle\PricingBundle\Tests\Functional\DataFixtures\LoadPriceListFallbackSettings',
            ]
        );
    }

    public function testFindByPrimaryKey()
    {
        $repository = $this->getRepository();

        /** @var PriceListToAccount $actualPriceListToAccount */
        $actualPriceListToAccount = $repository->findOneBy([]);
        if (!$actualPriceListToAccount) {
            $this->markTestSkipped('Can\'t test method because fixture was not loaded.');
        }

        $expectedPriceListToAccount = $repository->findByPrimaryKey(
            $actualPriceListToAccount->getPriceList(),
            $actualPriceListToAccount->getAccount(),
            $actualPriceListToAccount->getWebsite()
        );

        $this->assertEquals(spl_object_hash($expectedPriceListToAccount), spl_object_hash($actualPriceListToAccount));
    }

    /**
     * @dataProvider getPriceListDataProvider
     * @param string $account
     * @param string $website
     * @param array $expectedPriceLists
     */
    public function testGetPriceLists($account, $website, array $expectedPriceLists)
    {
        /** @var Account $account */
        $account = $this->getReference($account);
        /** @var Website $website */
        $website = $this->getReference($website);

        $actualPriceListsToAccount = $this->getRepository()->getPriceLists($account, $website);

        $actualPriceLists = array_map(
            function (PriceListToAccount $priceListToAccount) {
                return $priceListToAccount->getPriceList()->getName();
            },
            $actualPriceListsToAccount
        );

        $this->assertEquals($expectedPriceLists, $actualPriceLists);
    }

    /**
     * @return array
     */
    public function getPriceListDataProvider()
    {
        return [
            [
                'account' => 'account.level_1.2',
                'website' => 'US',
                'expectedPriceLists' => [
                    'priceList2'
                ]
            ],
            [
                'account' => 'account.orphan',
                'website' => 'US',
                'expectedPriceLists' => [
                ]
            ],
            [
                'account' => 'account.level_1_1',
                'website' => 'US',
                'expectedPriceLists' => [
                    'priceList2',
                    'priceList1'
                ]
            ],
            [
                'account' => 'account.level_1.1.1',
                'website' => 'Canada',
                'expectedPriceLists' => [
                    'priceList5'
                ]
            ],
        ];
    }

    /**
     * @dataProvider getPriceListIteratorDataProvider
     * @param string $accountGroup
     * @param string $website
     * @param array $expectedAccounts
     */
    public function testGetAccountIteratorByFallback($accountGroup, $website, $expectedAccounts)
    {
        /** @var $accountGroup  AccountGroup */
        $accountGroup = $this->getReference($accountGroup);
        /** @var $website Website */
        $website = $this->getReference($website);

        $iterator = $this->getRepository()
            ->getAccountIteratorByFallback($accountGroup, $website, PriceListAccountFallback::ACCOUNT_GROUP);

        $actualSiteMap = [];
        foreach ($iterator as $account) {
            $actualSiteMap[] = $account->getName();
        }
        $this->assertSame($expectedAccounts, $actualSiteMap);
    }

    /**
     * @return array
     */
    public function getPriceListIteratorDataProvider()
    {
        return [
            [
                'accountGroup' => 'account_group.group1',
                'website' => 'US',
                'expectedAccounts' => ['account.level_1.3']
            ],
        ];
    }

    public function testGetAccountWebsitePairsByAccountGroup()
    {
        /** @var AccountGroup $accountGroup */
        $accountGroup = $this->getReference('account_group.group1');
        /** @var Account $account */
        $account = $this->getReference('account.level_1.3');
        /** @var Website $website */
        $website = $this->getReference('US');
        $result = $this->getRepository()->getAccountWebsitePairsByAccountGroupIds(
            [$accountGroup->getId()],
            [$website->getId()]
        );
        $this->assertCount(1, $result);
        $this->assertEquals($result[0]['account'], $account);
        $this->assertEquals($result[0]['website'], $website);
    }

    public function testGetAccountWebsitePairsByAccountIds()
    {
        /** @var Account $account1 */
        $account1 = $this->getReference('account.level_1_1');
        /** @var Account $account2 */
        $account2 = $this->getReference('account.level_1.3');
        /** @var Website $website */
        $website = $this->getReference('US');
        $result = $this->getRepository()->getAccountWebsitePairsByAccountIds([$account1->getId(), $account2->getId()]);
        $this->assertCount(2, $result);
        $this->assertContains(['account' => $account1, 'website' => $website], $result);
        $this->assertContains(['account' => $account2, 'website' => $website], $result);
    }

    /**
     * @return PriceListToAccountRepository
     */
    protected function getRepository()
    {
        return $this->getContainer()->get('doctrine')->getRepository('OroB2BPricingBundle:PriceListToAccount');
    }
}
