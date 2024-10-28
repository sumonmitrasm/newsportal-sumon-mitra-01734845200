<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        // Ensure the 'posts' directory exists within storage/app/public
        Storage::disk('public')->makeDirectory('posts');

        // Define the image filename
        $filename = 'posts/' . Str::random(10) . '.jpg';

        // Create a blank image with a color
        $image = imagecreatetruecolor(640, 480);
        $backgroundColor = imagecolorallocate($image, 200, 200, 200); // Light gray background
        imagefill($image, 0, 0, $backgroundColor);

        // Add some text to the image (optional)
        $textColor = imagecolorallocate($image, 50, 50, 50); // Dark gray text
        imagestring($image, 5, 20, 20, 'Dummy Image', $textColor);

        // Save the image to the public/posts directory
        ob_start();
        imagejpeg($image);
        $imageData = ob_get_clean();
        Storage::disk('public')->put($filename, $imageData);

        // Free up memory
        imagedestroy($image);

        return [
            'title' => $this->faker->sentence,
            'sub_title' => $this->faker->sentence,
            'image' => $filename, // Store the image path in the database
            'description' => $this->faker->paragraph,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
