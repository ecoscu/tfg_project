<?php

namespace App\Http\Controllers;

use App\Models\ListContent;
use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Contenido;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ProfilePageController;

class ListsController extends Controller
{
    public function create()
    {
        return view('lists');
    }

    public function store(Request $request)
    {
        abort_unless(Auth::check(), 401);

        $userID = Auth::user()->id;

        $lists = new Lists;
        $lists->name = $request->input('name');
        $lists->privacy = $request->input('privacy') == 'public' ? true : false;
        $lists->description = $request->input('descripcion');
        $lists->user_id = $userID;

        $lists->save();

        return Redirect::to('/profile-page/');
    }

    public function show($lista_id)
    {
        abort_unless(Auth::check(), 401);

        $list = Lists::where('id', $lista_id)->first();

        $contents_ids = ListContent::where('lists_id', $lista_id)->pluck('contenidos_id');

        $listContents = [];

        foreach ($contents_ids as $content_id) {
            $content = Contenido::where('id', $content_id)->first();
            $listContents[] = $content;
        }

        foreach ($listContents as $content) {
            if ($content->Img != null) {
                $content->base64Img = base64_encode($content->Img);
            }

        }

        return view('lista', ['lista' => $list, 'listContents' => $listContents]);
    }


    public function addcontent($lista_id, $content_id)
    {
        $existinglistcontent = ListContent::where('lists_id', $lista_id)
            ->where('contenidos_id', $content_id)
            ->first();

        if ($existinglistcontent) {
            ListContent::where('lists_id', $lista_id)
                ->where('contenidos_id', $content_id)
                ->delete();

        } else {

            $listcontent = new ListContent;
            $listcontent->lists_id = $lista_id;
            $listcontent->contenidos_id = $content_id;
            $listcontent->save();
        }

        return Redirect::to('/lists/' . $lista_id);
    }


    public function removecontentnolink($lista_id, $content_id)
    {
        ListContent::where('lists_id', $lista_id)
            ->where('contenidos_id', $content_id)
            ->delete();
    }

    public function removecontent($lista_id, $content_id)
    {   
        $this->removecontentnolink($lista_id, $content_id);

        return Redirect::to('/lists/' . $lista_id);
    }

    public function deletelist($lista_id)
    {
        $listcontent = ListContent::where('lists_id', $lista_id)->pluck('contenidos_id');

        foreach ($listcontent as $content) {
            $this->removecontentnolink($lista_id, $content);
        }

        Lists::where('id', $lista_id)->delete();

        return Redirect::to('/profile-page/');
    }

}