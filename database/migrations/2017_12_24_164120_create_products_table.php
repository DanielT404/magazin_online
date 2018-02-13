<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateProductsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');

            /* Foreign keys to color and length table */

            $table->integer('color_id')->unsigned()->nullable();

            $table->integer('length_id')->unsigned()->nullable();

            $table->integer('category_id')->unsigned();

            $table->integer('subcategory_id')->unsigned()->nullable();

            $table->foreign('color_id')

                ->references('id')->on('colors')

                ->onDelete('restrict');

            $table->foreign('length_id')

                ->references('id')->on('lengths')

                ->onDelete('restrict');

            $table->foreign('category_id')

                ->references('id')->on('categories')

                ->onDelete('restrict');

            $table->foreign('subcategory_id')
                ->references('id')->on('subcategories')
                ->onDelete('restrict');





            /* Fields of the Product table */

            $table->string('name', 255);

            $table->string('slug', 255);

            $table->string('description', 255);

            $table->string('image', 255);

            $table->string('price');

            $table->enum('currency', ['lei', '€', '$']);

            $table->enum('color_option', ['Yes', 'No']);

            $table->enum('length_option', ['Yes', 'No']);

            $table->integer('stock');

            $table->boolean('featured');



            /* Timestamps */

            $table->timestamps();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('products');

    }

}

