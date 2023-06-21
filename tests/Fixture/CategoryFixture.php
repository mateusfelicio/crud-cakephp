<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoryFixture
 */
class CategoryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'category';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Test 1',
                'created' => '2023-06-20 05:05:53',
                'modified' => '2023-06-20 05:05:53',
            ],
            [
                'id' => 2,
                'name' => 'Test 2',
                'created' => '2023-06-20 05:06:53',
                'modified' => '2023-06-20 05:06:53',
            ],
        ];

        parent::init();
    }
}
