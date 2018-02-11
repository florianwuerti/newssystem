<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\User;
use Image;

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
          'title' => 'required|max:255',
          'text' => 'required',
          'category.*' => 'required',
          'post_thumbnail' => 'image|mimes:jpeg,jpg,png|max:2000',
      ]);

      // Wird geprüft, ob ein Thumbnail vorhanden ist.
      if( $request->hasFile('post_thumbnail') ) {

        // Speichert die Thumbnail Info's in eine Variable
        $image = $request->file('post_thumbnail');

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

      // Das Model wird mit Daten gefüllt...
      $news->title = $request->title;
      $news->text = $request->text;
      $news->user_id = $user_id;
      $news->post_thumbnail = $fileName;


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
        $news = News::orderBy('id', 'desc')->get();

        // Hier wird der View /news/overview.blade.php ausgegeben mit den Daten aus $news
        return view('news.overview', compact('news'));
    }

    public function view($id)
    {
        // Hier wird die genaue News aus der Datenbank geladen inkl. Kategorien
        $news = News::where('id', $id)->with('categories')->first();

        // Wir brauchen auch den User, der die News geschrieben hat. Der wird hier ausgegeben.
        $user = User::where('id', $news->user_id)->first();

        // Hier geben wir die News dann aus
        return view('news.view', compact('news', 'user'));
    }
}
