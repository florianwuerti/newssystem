<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\User;
use Image;
use Illuminate\Support\Facades\Input;

use Auth;

class NewsController extends Controller
{
  public function create()
  {
      $categories = Category::all();
      return view('news.create', compact('categories'));
  }
  /**
   * Speichert die News in der Datenbank ab
   *
   */
  public function save(Request $request)
  {
      // Hier wird die Eingabe des Nutzers validiert
      $this->validate($request, [
          'news_title' => 'required|max:255',
          'news_content' => 'required',
          'category.*' => 'required',
          'news_thumbnail' => 'image|mimes:jpeg,jpg,png',
      ]);

      // Wird geprüft, ob ein Thumbnail vorhanden ist.
      if( $request->hasFile('news_thumbnail') ) {

        // Speichert die Thumbnail Info's in eine Variable
        $image = $request->file('news_thumbnail');

        // Setzt den neuen Thumbnail-Name
        $fileName = time(). '.' . $image->getClientOriginalExtension();

        // Setzt den Dateipfad
        $location = public_path('uploads/' . $fileName );

        // Speichert das neue Thumbnail in den neuen Ordner
        Image::make($image)->save($location);
      }

      // Hier holen wir die aktuelle ID des eingeloggten Nutzers um sie zu speichern
      $user_id = Auth::id();

      // Neues News-Model
      $news = new News;

      $status = 'draft';

      // Das Model wird mit Daten gefüllt...
      $news->news_title = $request->news_title;
      $news->news_content = $request->news_content;
      $news->news_author = $user_id;

      if(!empty($news->news_thumbnail)) {
        $news->news_thumbnail = $fileName;
      }else {
        $news->news_thumbnail;
      }
      $news->news_status = $status;


      // ...und gespeichert
      $news->save();

      // Hiermit werden die Kategorien mit der News verbunden
      $news->categories()->sync($request->category);

      // Der User wird bei erfolgreichem Speichern zurück zum Formular geschickt
      return redirect()->back();
    }

    public function overview()
    {
      // Alle News in der Variable $news speichern
        $news = News::orderBy('created_at', 'desc' )->where('news_status', 'publish')->get();


        // Hier wird der View /news/overview.blade.php ausgegeben mit den Daten aus $news
        return view('news.overview', compact('news'));
    }

    public function view($id)
    {
        // Hier wird die genaue News aus der Datenbank geladen inkl. Kategorien
        $news = News::where('id', $id)->with('categories')->first();

        // Wir brauchen auch den User, der die News geschrieben hat. Der wird hier ausgegeben.
        $user = User::where('id', $news->news_author)->first();

        // Hier geben wir die News dann aus
        return view('news.view', compact('news', 'user'));
    }

    public function edit($id)
    {
      $categories = Category::all();
      // Hier wird die genaue News aus der Datenbank geladen inkl. Kategorien
      $news = News::where('id', $id)->with('categories')->first();


      return view('news.edit', compact('news', 'user', '$categories'));

    }

    public function update(Request $request, $id)
    {

      if($request->has('updateNews')) {

        $news = News::find($id);

        $this->validate($request, [
            'news_title' => 'max:255',
            'news_thumbnail' => 'image|mimes:jpeg,jpg,png',
        ]);

        // Wird geprüft, ob ein Thumbnail vorhanden ist.
        if( $request->hasFile('news_thumbnail') ) {

          // Speichert die Thumbnail Info's in eine Variable
          $image = $request->file('news_thumbnail');

          // Setzt den neuen Thumbnail-Name
          $fileName = time(). '.' . $image->getClientOriginalExtension();

          // Setzt den Dateipfad
          $location = public_path('uploads/' . $fileName );

          // Speichert das neue Thumbnail in den neuen Ordner
          Image::make($image)->save($location);
        }

        $news->update([
          'news_title' => $request->news_title,
          'news_content' => $request->news_content,
          ''
        ]);

        // Hiermit werden die Kategorien mit der News verbunden
        $news->categories()->sync($request->category);

        return redirect()->back();

      }else if($request->has('publish')) {

        $news = News::find($id);

        $news->update([
          'news_status' => $request->publish,
        ]);

        // Der User wird bei erfolgreichem Speichern zurück zum Formular geschickt
        return redirect()->back();

      }
    }

    public function show() {

      // Hier wird die genaue News aus der Datenbank geladen inkl. Kategorien
      $news = News::orderBy('created_at', 'desc')->get();

      // Wir brauchen auch den User, der die News geschrieben hat. Der wird hier ausgegeben.


      // Hier geben wir die News dann aus
      return view('news.show', compact('news'));

    }

    public function getUser()
    {
      $user = User::where('id', 'App\News', $news->news_author)->get();
    }
}
