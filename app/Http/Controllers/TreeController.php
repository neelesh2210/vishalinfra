<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class TreeController extends Controller
{

    public function tree(Request $request){
        if($request->user_name){
            $user_name = $request->user_name;
        }else{
            $user_name = Auth::guard('web')->user()->user_name;
        }

        return view('frontend.user.tree',compact('user_name'));
    }

    private function getChildren($userName){
        return User::where('sponsor_code', $userName)->get();
    }

    public function referral_details(Request $request){
        $data=User::where('user_name', $request->user_name)->first();
        return 'Name: '.$data->name.'('.$data->id.')<br>User Id: '.$data->user_name.' <br>Sponsor Id: '.$data->sponsor_code;
    }

    private function buildTree($userName = null,$level = 1){
        if ($level > 4) {
            return null;
        }
        $node = User::where('user_name', $userName)->first();
        if (!$node) {
            return null;
        }
        $children = $this->getChildren($userName);
        if (!$children->count()) {
            return [
                'v' => $node->user_name,
                'f' =>'<div class=mytooltip><img src="'.$node->user?->userProfile?->avatar.'" style=height:50px;width:50px; onerror="this.onerror=null;this.src=\''.asset('backend/img/no-image.png').'\'"><a
                href='.route('user.tree').'?user_name='.$node->user_name.'><span class=mbb-3>'.$node->user_name.'</span><br><span
                class=brdr-class>'.$node->name.'</span></a><span class=mytext id=my'.$node->user_name.'></span></div>' ,
                'p' => $node->sponsor_code ?: null,
            ];
        }
        $tree = [
            'v' => $node->user_name,
            'f' => '<div class=mytooltip><img src="'.$node->user?->userProfile?->avatar.'" style=height:50px;width:50px; onerror="this.onerror=null;this.src=\''.asset('backend/img/no-image.png').'\'"><a
            href='.route('user.tree').'?user_name='.$node->user_name.'><span class=mbb-3>'.$node->user_name.'</span><br><span
                 class=brdr-class>'.$node->name.'</span></a><span class=mytext id=my'.$node->user_name.'></span></div>',
            'p' => $node->sponsor_code ?: null,
            'c' => [],
        ];
        foreach ($children as $child) {
            $tree['c'][] = $this->buildTree($child->user_name,$level + 1);
        }

        return $tree;
    }

    public function getMLMTree(Request $request){
        $topLevelUserName = $request->user_name;
        $mlmTree = $this->buildTree($topLevelUserName);

        return response()->json($mlmTree);
    }

}
