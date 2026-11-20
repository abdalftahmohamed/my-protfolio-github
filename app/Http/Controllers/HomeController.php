<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $skills = Skill::visible()->ordered()->get()->groupBy('category');
        $projects = Project::visible()->ordered()->get();
        $experiences = Experience::visible()->ordered()->get();
        $educations = Education::visible()->ordered()->get();
        $testimonials = Testimonial::visible()->ordered()->get();

        return view('home', compact('profile', 'skills', 'projects', 'experiences', 'educations', 'testimonials'));
    }
}
