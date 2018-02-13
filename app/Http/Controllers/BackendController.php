<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/backend/home');
    }

    /**
     * Return the json file containing the current site settings.
     *
     * @return string
     */
    public function getSiteSettings() {
        $settings = config('constants');

        return json_encode($settings);
    }

    /**
     * Save site settings
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveSiteSettings(Request $request) {
        $data = $request->validate([
            'site-title' => 'required|max:255',
            'google-tag' => 'nullable',
            'tiny-mce-key' => 'nullable',
        ]);

        $conf = [
            'constants.SITE_TITLE' => $data['site-title'],
            'constants.GOOGLE_ANALYTICS_KEY' => $data['google-tag'],
            'constants.TINY_MCE_KEY' => $data['tiny-mce-key']
        ];

        config($conf);
        $fp = fopen(base_path() .'/config/constants.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('constants'), true) . ';');
        fclose($fp);


        return redirect('/backend/home/');
    }

    public function getPages() {
        $pages = Page::all();

        return json_encode($pages);
    }

    public function getPage($id){
        $page = Page::find($id);

        return json_encode($page);
    }

    public function addPage(Request $request) {
        $data = $request->validate([
           'page-name' => 'required|string|max:255',
           'page-content' => 'required|string',
           'page-category' => 'required|string'
        ]);

        $this->savePage($data);

        return view('backend.home');
    }

    public function editPage($id = null) {
        $pages = Page::all();

        if(isset($id)) {
            $page = Page::find($id);
        }

        return view('backend.page.edit', ['pages' => $pages,
                                                'page' => (isset($page) ? $page : null) ]
        );
    }

    public function deletePage($id) {
        die;
        $page = Page::find($id);
        $page->delete();

        return view('/backend/home');
    }

    public function saveEdit($id, Request $request) {
        $data = $request->validate([
            'page-name' => 'required|string|max:255',
            'page-content' => 'required|string',
            'page-category' => 'required|string'
        ]);

        $this->savePage($data, $id);
        return view('backend.home');
    }

    private function savePage($data, $id = null) {
        if(empty($id)) {
            $page = new Page();
        } else {
            $page = Page::find($id);
        }

        $page->title = $data['page-name'];
        $page->entry = $data['page-content'];
        $page->category = $data['page-category'];
        $page->save();
    }
}
