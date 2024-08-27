<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class TagController extends Controller
{
    //
    public function index()
    {
        // $tags = DB::select("SELECT name, SUBSTR(name, 1, 1) AS alpha FROM tags GROUP BY SUBSTR(name, 0, 2), name ORDER BY alpha, name");

        $topics = Tag::selectRaw('id, name, slug, SUBSTR(name, 1, 1) as alpha')
                    ->orderBy('alpha', 'asc')
                    ->where('status', 'active')
                    ->get()
                    ->groupBy('alpha');

        $this->data['title'] = "Topic";
        // $this->data['tags'] = $tags;
        $this->data['topics'] = $topics;
		return $this->loadTheme('tags.index', $this->data);
    }

    public function show($letter)
    {
        $alpha = Str::lower($letter);
        $tags = Tag::where('name', 'like', "{$alpha}%")->where('status', 'active')->orderBy('name', 'asc');

        $this->data['title'] = "Topic Letter: " . ucfirst($letter);
        $this->data['tags'] = $tags->get();
        $this->data['letter'] = $letter;
		return $this->loadTheme('tags.detail', $this->data);
    }

    public function getTags()
    {
        $quotes = Quote::select('tags')->get()->toArray();
        return $quotes;
    }

    public function test()
    {
        $array = [
            ['Life', 'Love', 'Music'],
            ['Name', 'Why', 'Artist'],
            ['Mom', 'Me', 'Proud'],
            ['Crazy', 'Dead', 'Name'],
            ['Artist', 'First', 'Made'],
            ['Life', 'Love', 'Family'],
        ];

        foreach ($array as $key) {
            // dump($key);
            foreach ($key as $value) {
                Tag::create([
                    'name' => $value,
                    'slug' => Str::slug($value),
                ]);
            }
        }

        return 'insert array value';
    }

    public function storeTag()
    {
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata1.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata2.json');
        // $json = Storage::disk('local')->get('/public/quote_jagokata/quote_jagokata3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a1.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a2.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a3.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a4.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a5.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a6.json');
        // $json = Storage::disk('local')->get('/public/quote_a/quote_a7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b1.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b2.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b3.json');
        // $json = Storage::disk('local')->get('/public/quote_b/quote_b4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c1.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c2.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c3.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c4.json');
        // $json = Storage::disk('local')->get('/public/quote_c/quote_c5.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d1.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d2.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d3.json');
        // $json = Storage::disk('local')->get('/public/quote_d/quote_d4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e1.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e2.json');
        // $json = Storage::disk('local')->get('/public/quote_e/quote_e3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_f/quote_f.json');
        // $json = Storage::disk('local')->get('/public/quote_f/quote_f1.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g1.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g2.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g3.json');
        // $json = Storage::disk('local')->get('/public/quote_g/quote_g4.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h.json');
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h1.json');
        // $json = Storage::disk('local')->get('/public/quote_h/quote_h2.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_i/quote_i.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j1.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j2.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j3.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j4.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j5.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j6.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j7.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j8.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j9.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j10.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j11.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j12.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j13.json');
        // $json = Storage::disk('local')->get('/public/quote_j/quote_j14.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k1.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k2.json');
        // $json = Storage::disk('local')->get('/public/quote_k/quote_k3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l1.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l2.json');
        // $json = Storage::disk('local')->get('/public/quote_l/quote_l3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m1.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m2.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m3.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m4.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m5.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m6.json');
        // $json = Storage::disk('local')->get('/public/quote_m/quote_m7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n.json');
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n1.json');
        // $json = Storage::disk('local')->get('/public/quote_n/quote_n2.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_o/quote_o.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p1.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p2.json');
        // $json = Storage::disk('local')->get('/public/quote_p/quote_p3.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_q/quote_q.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r1.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r2.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r3.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r4.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r5.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r6.json');
        // $json = Storage::disk('local')->get('/public/quote_r/quote_r7.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s1.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s2.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s3.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s4.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s5.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s6.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s7.json');
        // $json = Storage::disk('local')->get('/public/quote_s/quote_s8.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t1.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t2.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t3.json');
        // $json = Storage::disk('local')->get('/public/quote_t/quote_t4.json');
        $json = Storage::disk('local')->get('/public/quote_t/quote_t5.json');
        // 
        // $json = Storage::disk('local')->get('/public/quote_u/quote_u.json');
        // $json = Storage::disk('local')->get('/public/quote_v/quote_v.json');
        // $json = Storage::disk('local')->get('/public/quote_w/quote_w.json');
        // $json = Storage::disk('local')->get('/public/quote_w/quote_w1.json');
        // $json = Storage::disk('local')->get('/public/quote_x/quote_x.json');
        // $json = Storage::disk('local')->get('/public/quote_y/quote_y.json');
        // $json = Storage::disk('local')->get('/public/quote_z/quote_z.json');

        //oquvwxyz

        $records = json_decode($json, true);

        foreach($records as $record) {
            foreach($record['tags'] as $r) {
                try {
                    Tag::create([
                        'name' => $r,
                        'slug' => Str::slug($r),
                    ]);
                } catch (QueryException $e) {
                    if ($this->isDuplicateEntryException($e)) {
                        // throw new DuplicateEntryException('Duplicate Entry');
                        continue;
                    }
                    // throw $e;
                }
                
            }
        }

        return 'tag stored succesfully';
    }

    private function isDuplicateEntryException(QueryException $e)
    {
        $sqlState = $e->errorInfo[0];
        $errorCode  = $e->errorInfo[1];
        if ($sqlState === "23000" && $errorCode === 1062) {
            return true;
        }
        return false;
    }
}
