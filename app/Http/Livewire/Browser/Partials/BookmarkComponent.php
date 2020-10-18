<?php

namespace App\Http\Livewire\Browser\Partials;

use Livewire\Component;

use App\Models\Article;
use App\Models\Bookmark;

class BookmarkComponent extends Component
{
  public $article_model = 'App\Models\Article';

  public $bookmarkableId;

  protected $listeners = [
    'bookMarkRefresh' => '$refresh',
  ];

  public function mount($bookmarkableId)
  {
    $this->bookmarkableId = $bookmarkableId;
  }

  public function bookmark($id)
  {
    $user = current_user();
    if ($user) {
      if ($user->bookmarked($this->article_model ,$id)) {
        $bookmarked = $user->bookmarks->where('bookmarkable_type', $this->article_model)
                              ->where('bookmarkable_id',$id)
                              ->first();
        $bookmarked->delete();
      } else {
        $article = Article::find($id);
        if ($user && $article) {
          $bookmark  = Bookmark::create([
            'user_id' => $user->id,
            'bookmarkable_id' => $article->id,
            'bookmarkable_type' => $this->article_model,
          ]);
        }
      }
      $this->emit('bookMarkRefresh');
    }
  }

  public function render()
  {
      return view('livewire.browser.partials.bookmark-component');
  }
}
