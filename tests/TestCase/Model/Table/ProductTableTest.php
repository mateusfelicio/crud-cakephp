<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductTable Test Case
 */
class ProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductTable
     */
    protected $Product;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Product',
        'app.Category',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Product') ? [] : ['className' => ProductTable::class];
        $this->Product = $this->getTableLocator()->get('Product', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Product);

        parent::tearDown();
    }

    /**
     * Test finding all products
     *
     * @return void
     */
    public function testFindAllProducts(): void
    {
        $products = $this->Product->find('all')->toArray();

        $this->assertNotEmpty($products);
        $this->assertCount(2, $products);
    }

    /**
     * Test finding a product by ID
     *
     * @return void
     */
    public function testFindProductById(): void
    {
        $productId = 1;

        $product = $this->Product->get($productId);

        $this->assertInstanceOf('Cake\ORM\Entity', $product);
        $this->assertSame($productId, $product->id);
    }

    /**
     * Test saving a new product
     *
     * @return void
     */
    public function testSaveNewProduct(): void
    {
        $productData = [
            'name' => 'Test Product',
            'description' => 'Test description',
            'price' => 9.99,
            'category_id' => 1,
        ];

        $product = $this->Product->newEntity($productData);
        $result = $this->Product->save($product);

        $this->assertInstanceOf('Cake\ORM\Entity', $result);
        $this->assertFalse($product->hasErrors());
        $this->assertNotEmpty($result->id);
        $this->assertSame($productData['name'], $result->name);
        $this->assertSame($productData['description'], $result->description);
        $this->assertSame((float) $productData['price'], (float) $result->price);
        $this->assertSame($productData['category_id'], $result->category_id);
    }

    /**
     * Test updating an existing product
     *
     * @return void
     */
    public function testUpdateProduct(): void
    {
        $productId = 1;
        $newName = 'Updated Product';
        $newDescription = 'Updated description';
        $newPrice = 19.99;
        $newCategoryId = 2;

        $product = $this->Product->get($productId);
        $product->name = $newName;
        $product->description = $newDescription;
        $product->price = $newPrice;
        $product->category_id = $newCategoryId;

        $result = $this->Product->save($product);

        $this->assertInstanceOf('Cake\ORM\Entity', $result);
        $this->assertFalse($product->hasErrors());
        $this->assertSame($productId, $result->id);
        $this->assertSame($newName, $result->name);
        $this->assertSame($newDescription, $result->description);
        $this->assertSame((float) $newPrice, (float) $result->price);
        $this->assertSame($newCategoryId, $result->category_id);
    }

    /**
     * Test deleting a product
     *
     * @return void
     */
    public function testDeleteProduct(): void
    {
        $productId = 1;

        $product = $this->Product->get($productId);
        $result = $this->Product->delete($product);

        $this->assertTrue($result);

        $deletedProduct = $this->Product->findById($productId)->first();
        $this->assertNull($deletedProduct);
    }
}
