<?php

namespace App\Http\Controllers\API;

use App\Models\Borrow;
use App\Http\Controllers\Controller;
use App\Models\UserLibraryLike;
use Illuminate\Http\Request;
use App\Utils\ApiResponse;

class LibraryController extends Controller
{
    private function getLibrariesFromSekolah(Request $request, string $libraryIds) {
        $params = "";
        if ($request->q) {
            $params .= "&q=" . $request->q;
        }
        
        if ($request->filter_type) {
            $params .= "&filter_type=" . $request->filter_type;   
        }
        
        if ($request->kategori_id) {
            $params .= "&kategori_id=" . $request->kategori_id;
        }
        
        if ($request->page) {
            $params .= "&page=" . $request->page;
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://beta.literasia.co.id/api/library?order_by=newest" . $libraryIds . $params,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => []
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
        }
        return $response;
    }
    
    public function getLibraries(Request $request) {
        if ($request->order_by) {
            if ($request->order_by === 'borrowed') {
                return $this->getBorrow($request->user_id, $request);
            } else if ($request->order_by === 'like') {
                return $this->getLikes($request->user_id, $request);
            }
        }
        $response = $this->getLibrariesFromSekolah($request, "");
        return $response;
    }
    
    public function getLikes($id, Request $request)
    {
        $likes = UserLibraryLike::where([
            'user_id' => $id
        ])->orderByDesc('library_id')->get();

        $libraryIds = "";
        $i = 0;
        foreach($likes as $like) {
            $libraryIds .= "&library_ids[$i]=" . $like->library_id;
            $i++;
        }
        if ($libraryIds == "") {
            return response()->json(ApiResponse::success($likes));
        }

        $response = $this->getLibrariesFromSekolah($request, $libraryIds);
        $libraries = $response['data'];
        $i = 0;
        
        $libraryIndexesToRemove = [];
        foreach($likes as $l) {
            if (!empty($libraries[$i]) && $libraries[$i]['id'] == $l->library_id) {
                $library = $libraries[$i];
                $l->name = $library['name'];
                $l->deskripsi = $library['Deskripsi'] ?? "";
                $l->kategori = $library['kategori'];
                $l->thumbnail = $library['thumbnail'];
                $l->link_video = $library['link_video'] ?? "";
                $l->link_audio = $library['link_audio'] ?? "";
                $l->link_ebook = $library['link_ebook'] ?? "";
                $l->tahun_terbit = $library['tahun_terbit'];
            } else {
                $libraryIndexesToRemove[] = $i;
            }
            $i++;
        }
        
        foreach($libraryIndexesToRemove as $i) {
            unset($likes[$i]);
        }
        $result = ApiResponse::success($likes);
        $result['total'] = $response['total'];
        return response()->json($result);
    }
    

    public function getBorrow($id, Request $request)
    {
        if ($request->library_id) {
            $borrow = Borrow::where([
                'user_id' => $id,
                'library_id' => $request->library_id
            ])->orderByDesc('library_id')->get();
        } else {
            $borrow = Borrow::where([
                'user_id' => $id
            ])->orderByDesc('library_id')->get();
        }
        
        $libraryIds = "";
        $i = 0;
        foreach($borrow as $b) {
            $libraryIds .= "&library_ids[$i]=" . $b->library_id;
            $i++;
        }
        if ($libraryIds == "") {
            return response()->json(ApiResponse::success($borrow));
        }

        $response = $this->getLibrariesFromSekolah($request, $libraryIds);
        $libraries = $response['data'];
        $i = 0;
        
        $libraryIndexesToRemove = [];
        foreach($borrow as $b) {
            if (!empty($libraries[$i]) && $libraries[$i]['id'] == $b->library_id) {
                $library = $libraries[$i];
                $b->name = $library['name'];
                $b->deskripsi = $library['Deskripsi'] ?? "";
                $b->kategori = $library['kategori'];
                $b->thumbnail = $library['thumbnail'];
                $b->link_video = $library['link_video'] ?? "";
                $b->link_audio = $library['link_audio'] ?? "";
                $b->link_ebook = $library['link_ebook'] ?? "";
                $b->tahun_terbit = $library['tahun_terbit'];
            } else {
                $libraryIndexesToRemove[] = $i;
            }
            $i++;
        }
        
        foreach($libraryIndexesToRemove as $i) {
            unset($borrow[$i]);
        }
        $result = ApiResponse::success($borrow);
        $result['total'] = $response['total'];
        return response()->json($result);
    }

    public function addBorrow($id, Request $request)
    {
        $borrow  = Borrow::where([
            ['user_id', $id],
            ['library_id', $request->library_id]
        ])->first();

        if (!$borrow) {
            $data = Borrow::create([
                'user_id' => $id,
                'library_id' => $request->library_id,
                'ebook_expired_at' => $request->ebook_expired_at,
                'audio_expired_at' => $request->audio_expired_at,
                'video_expired_at' => $request->video_expired_at,
                'total_of_borrow' => 1
            ]);
            return response()->json(ApiResponse::success($data, "Peminjaman Berhasil"));
        } else {
            $borrow->update([
                'ebook_expired_at' => $request->ebook_expired_at,
                'audio_expired_at' => $request->audio_expired_at,
                'video_expired_at' => $request->video_expired_at,
                'total_of_borrow' => $borrow->total_of_borrow + 1
            ]);
            
            return response()->json(ApiResponse::success($borrow, "Peminjaman Berhasil"));
        }
    }

    public function like($id, Request $request)
    {
        $data = $request->all();
        $data['is_like'] = ($data['is_like'] == 'true');
        $like = UserLibraryLike::where([
            ['user_id', $data['user_id']],
            ['library_id', $id]
        ])->first();

        if ($like && !$data['is_like']) {
            $like->delete();
        } else if (!$like && $data['is_like']) {
            UserLibraryLike::create([
                'user_id' => $data['user_id'],
                'library_id' => $id
            ]);
        }

        return response()->json(ApiResponse::success([]));
    }
}
