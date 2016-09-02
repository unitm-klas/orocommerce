<?php
namespace Oro\Bundle\FrontendNavigationBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class OroFrontendNavigationBundle implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        /** Generate table orob2b_front_nav_menu_update **/
        $table = $schema->createTable('orob2b_front_nav_menu_update');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('key', 'string', ['length' => 100]);
        $table->addColumn('parent_id', 'string', ['length' => 100]);
        $table->addColumn('title', 'string', ['length' => 255]);
        $table->addColumn('menu', 'string', ['length' => 100]);
        $table->addColumn('ownership_type', 'integer', []);
        $table->addColumn('owner_id', 'integer', ['notnull' => false]);
        $table->addColumn('is_active', 'boolean', []);
        $table->addColumn('priority', 'integer', []);
        $table->addColumn('image', 'string', ['length' => 256]);
        $table->addColumn('description', 'string', ['length' => 100]);
        $table->addColumn('condition', 'string', ['length' => 512]);
        $table->addColumn('website_id', 'integer', ['notnull' => false]);
        $table->setPrimaryKey(['id']);

        $table->addForeignKeyConstraint(
            $schema->getTable('orob2b_website'),
            ['website_id'],
            ['id'],
            ['onUpdate' => null, 'onDelete' => 'CASCADE']
        );
    }
}
