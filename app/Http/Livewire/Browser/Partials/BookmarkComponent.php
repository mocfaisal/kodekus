<?php

namespace App\Http\Livewire\Browser\Partials;

use App\Models\Article;

use Livewire\Component;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Session;

class BookmarkComponent extends Component
{
  public $article_model = 'App\Models\Article';

  public $bookmarkableId;
  public $label;

  protected $listeners = [
    'bookmarkRefresh' => '$refresh',
  ];

  public function mount($bookmarkableId, $label = null)
  {
    $this->bookmarkableId = $bookmarkableId;
    $this->label = $label;
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
      $this->emit('bookmarkRefresh');
      $this->emitTo('Browser.Bookmarks.BookmarksComponent','bookmarkRefresh');
    } else {
      Session::put('url.intended',url()->previous());
      return redirect()->route('browser.auth.show',['type'=> 'login']);
    }
  }

  public function render()
  {
      return view('livewire.browser.partials.bookmark-component');
  }
}
