<?php

namespace App;


use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;

    public static function archives()
    {
        $dt = static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
            //->toArray();

        return $dt;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        //return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id'); что даст указание доп параметров?
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // change2 author
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->BelongsTo(Category::class)->withDefault(); //withDefault() ?
    }

    public function AddComment($user_id,  $body)
    {
/*
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
        ]);
*/
        //Eloquent have relationship - give you post_id, we can rewrite this more simple
        $this->comments()->create(compact('user_id', 'body'));
    }

    public function scopeFilter($query, $filters)
    {
        if(!empty($filters)) {
            if ($month = $filters['month']) {

                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if ($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }
    }

    public function fileUpload(Request $request, $uploaded_files_path)
    {

        if ($request->hasFile('images')) {
            if ($old_images = Post::find(request('id'))->images) {
                foreach (unserialize($old_images) as $old_image) {
                    unlink($uploaded_files_path.'/'.$old_image); // При upload устанавливается simlink?
                    Storage::delete($uploaded_files_path.'/'.$old_image); // TODO не отрабатывает удаление файла, удалить сразу массив imgs, это же добавить в удаление поста
                }
            }

            foreach ($files as $file) {
                $images[] = time() . '_' . $file->getClientOriginalName();
                $file->move($uploaded_files_path, last($images));
            }

        }

        return $images;
    }

    public function sluggable()
    {

        return [
          'slug' => [
            'source' => 'title'
          ]
        ];
    }

}
