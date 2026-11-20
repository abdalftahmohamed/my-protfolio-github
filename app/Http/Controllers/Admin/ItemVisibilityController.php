<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ItemVisibilityController extends Controller
{
    private const MODELS = [
        'skills' => Skill::class,
        'projects' => Project::class,
        'experiences' => Experience::class,
        'educations' => Education::class,
        'testimonials' => Testimonial::class,
    ];

    public function toggle(string $resource, int $id): RedirectResponse
    {
        if (! isset(self::MODELS[$resource])) {
            abort(404);
        }

        $item = self::MODELS[$resource]::findOrFail($id);
        $item->update(['visible' => ! $item->visible]);

        return back()->with(
            'status',
            Str::singular($resource).' '.($item->visible ? 'is now visible on the website.' : 'is now hidden from the website.')
        );
    }
}
