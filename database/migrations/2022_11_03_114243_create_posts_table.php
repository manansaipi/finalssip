<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
// Post::create([
//     'title'=>'Third Title',
//     'category_id' => 3,
//     'slug'=>'third-title',
//     'excerpt'=>'excerotOne',
//     'body' =>'loremssalkdakshfdisdgvcaskldhf asdhfg lhksdgfjkhagsdgkf kjasdhgf kuasdgf hasdhf lhagsdjkfgsadkjfgaskdg faihsydgfjkalsdbnfvkhascvbhjklasdhf uasdhyf asdgfyhasgdfusdkfg asdhfgaksdhfj sabvghjsadgviyasdgh ashdgfahsdg fyasg dfgasdyhfga skhldgfasyjd gfylkasdgf yig ask;djasuidfg aosldhfhjkla sdgf kuaysdghfiluyasgdykfgsdkufghakhsdgf asdhfkajsdhfjklasdf gasdklfhsdjnf'

// ])