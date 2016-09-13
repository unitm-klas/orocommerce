<?php

namespace Oro\Bundle\FrontendBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\ConfigBundle\Migration\RenameConfigSettingsQuery;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class OroFrontendBundle implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $queries->addPostQuery(
            new RenameConfigSettingsQuery(
                'oro_b2b_frontend.frontend_theme',
                'oro_frontend.frontend_theme'
            )
        );
    }
}
