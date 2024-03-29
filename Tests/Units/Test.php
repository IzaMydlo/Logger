<?php

namespace Units;

use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{
    private $queryBuilder;

    public function setUp(): void
    {
        $this->queryBuilder = new QueryBuilder();
        parent::setUp(); // TODO: Change the autogenerated stub

    }


    public function testItCanCreateRecirde()
    {
        $id = $this->queryBuilder->table('reports')->create($data);
        self::assertNotNull($id);
    }

    public function testItCanPerformRawQuery()
    {
        $result = $this->queryBuilder->raw("SELECT * FROM reports;");
        self::assertNotNull($id);

    }

    public function testItCanPerformSelectQuery{
        $result = $this->queryBuilder
            ->table('reports')
            ->select("*")
            ->where('id', 1)
            ->first();
        self::assertSame(1, (int)$result->id);
    }
    public function testItCanPerformSelectQueryWithMultipleWhereClause{
        $result = $this->queryBuilder
            ->table('reports')
            ->select("*")
            ->where('id', 1)
            ->where('report_type', '=', 'Report Type 1')
            ->first();
        self::assertSame(1, (int)$result->id);
        self::assertSame('Report Type 1', $result->report_type);

    }
}
