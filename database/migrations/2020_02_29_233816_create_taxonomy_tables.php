<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomyTables extends Migration
{
    /**
     * Terms table name.
     *
     * @var string
     */
    protected $termsTable;

    /**
     * Term taxonomy table name.
     *
     * @var string
     */
    protected $termTaxonomyTable;

    /**
     * Term relationships table name.
     *
     * @var string
     */
    protected $termRelationshipsTable;

    /**
     * Create a new migration.
     *
     * @return void
     */
    public function __construct()
    {
        $this->termsTable = 'terms';
        $this->termTaxonomyTable = 'term_taxonomy';
        $this->termRelationshipsTable = 'term_relationships';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $this->upTermTaxonomyTable();
        $this->upTermsTable();
        $this->upTermRelationshipsTable();
    }

    /**
     *
     */
    public function upTermTaxonomyTable(): void
    {
        Schema::create($this->termTaxonomyTable, static function (Blueprint $table) {
            $table->bigIncrements('term_taxonomy_id');
            $table->unsignedBigInteger('term_id')->nullable()->index();
            $table->string('taxonomy', 32)->index();
            $table->longText('description')->nullable();

            NestedSet::columns($table);

            $table->timestamps();
        });
    }

    /**
     *
     */
    public function upTermsTable(): void
    {
        Schema::create($this->termsTable, static function (Blueprint $table) {
            $table->bigIncrements('term_id');
            $table->string('name', 200)->index();
            $table->string('slug', 200)->index();
            $table->bigInteger('term_group')->default(0);
            $table->timestamps();
        });
    }

    /**
     *
     */
    public function upTermRelationshipsTable(): void
    {
        Schema::create($this->termRelationshipsTable, static function (Blueprint $table) {
            $table->morphs('object');
            $table->unsignedBigInteger('term_taxonomy_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists($this->termsTable);
        Schema::dropIfExists($this->termTaxonomyTable);
        Schema::dropIfExists($this->termRelationshipsTable);
    }
}
