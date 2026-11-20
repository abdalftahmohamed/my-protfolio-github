<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSection;
use Illuminate\Http\RedirectResponse;

class SiteSectionController extends Controller
{
    public function toggle(SiteSection $section): RedirectResponse
    {
        $section->update([
            'is_visible' => ! $section->is_visible,
        ]);

        $label = ucfirst(str_replace('_', ' ', $section->key));

        return back()->with(
            'status',
            $label.' section '.($section->is_visible ? 'is now visible on the website.' : 'is now hidden from the website.')
        );
    }
}
