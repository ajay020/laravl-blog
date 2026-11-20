<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    /**  The $fillable property specifies which attributes should be mass-assignable. 
     * This is a security feature in Laravel to prevent mass assignment vulnerabilities.
     * In this case, the 'title', 'slug', 'excerpt', 'body', and
     * 'published' attributes can be mass-assigned when creating or updating a Post model instance.
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published',
    ];

    // Override the getRouteKeyName method to use the slug for route model binding
    // This method is called when resolving route model bindings for the Post model.
    // By default, Laravel uses the 'id' column for route model binding, but we want to use the 'slug' column instead.
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Override the resolveRouteBinding method to include the published condition
    // This method is called when resolving route model bindings for the Post model.
    // It allows you to customize how the model is retrieved based on the route parameter.
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? $this->getRouteKeyName(), $value)
            ->where('published', true)
            ->firstOrFail();
    }

    // Define the relationship between the Post model and the User model
    // This method establishes a "belongs to" relationship, indicating that each Post belongs to a User.
    // The foreign key 'user_id' in the posts table is used to link the Post to its associated User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
