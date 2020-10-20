<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public $post;
    public $comment;
    public $successMessage;
    protected $rules = [
        'comment' => 'required|min:4'
    ];

    public function postComment()
    {
        $this->validate();
        sleep(1);
        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'Guest',
            'content' => $this->comment
        ]);

        $this->post->refresh();

        $this->comment = '';

        $this->successMessage = 'The comment has been published';
    }
    public function render()
    {
        return view('livewire.comments-section');
    }
}
