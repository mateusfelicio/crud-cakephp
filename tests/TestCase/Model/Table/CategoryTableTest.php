<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryTable Test Case
 */
class CategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryTable
     */
    protected $Category;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Category',
        'app.Product',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Category') ? [] : ['className' => CategoryTable::class];
        $this->Category = $this->getTableLocator()->get('Category', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Category);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialSetup(): void
    {
        $this->assertInstanceOf(CategoryTable::class, $this->Category);
        $this->assertEquals('category', $this->Category->getTable());
        $this->assertEquals(['id', 'name', 'created', 'modified'], $this->Category->getSchema()->columns());
    }

        /**
     * Test finding all categories
     *
     * @return void
     */
    public function testFindAllCategories(): void
    {
        $categories = $this->Category->find('all')->toArray();

        $this->assertNotEmpty($categories);
        $this->assertCount(2, $categories);
    }

    /**
     * Test finding a category by ID
     *
     * @return void
     */
    public function testFindCategoryById(): void
    {
        $categoryId = 1;

        $category = $this->Category->get($categoryId);

        $this->assertInstanceOf('Cake\ORM\Entity', $category);
        $this->assertSame($categoryId, $category->id);
    }

    /**
     * Test saving a new category
     *
     * @return void
     */
    public function testSaveNewCategory(): void
    {
        $categoryData = [
            'name' => 'Test Category',
        ];

        $category = $this->Category->newEntity($categoryData);
        $result = $this->Category->save($category);

        $this->assertInstanceOf('Cake\ORM\Entity', $result);
        $this->assertFalse($category->hasErrors());
        $this->assertNotEmpty($result->id);
        $this->assertSame($categoryData['name'], $result->name);
    }

    /**
     * Test updating an existing category
     *
     * @return void
     */
    public function testUpdateCategory(): void
    {
        $categoryId = 1;
        $newName = 'Updated Category';        

        $category = $this->Category->get($categoryId);
        $category->name = $newName;

        $result = $this->Category->save($category);

        $this->assertInstanceOf('Cake\ORM\Entity', $result);
        $this->assertFalse($category->hasErrors());
        $this->assertSame($categoryId, $result->id);
        $this->assertSame($newName, $result->name);
        $this->assertNotEquals('2023-06-20 05:05:53', $result->modified->format('Y-m-d H:i:s'));
    }

    /**
     * Test deleting a category
     *
     * @return void
     */
    public function testDeleteCategory(): void
    {
        $categoryId = 2;

        $category = $this->Category->get($categoryId);
        $result = $this->Category->delete($category);

        $this->assertTrue($result);

        $deletedCategory = $this->Category->findById($categoryId)->first();
        $this->assertNull($deletedCategory);
    }
}
