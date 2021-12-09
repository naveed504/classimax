<?php 

namespace App\Traits;
use Illuminate\Http\Request;

trait ImageTrait {
    /**

     * @param Request $request

     * @return $this|false|string

     */
    public function verifyAndUpload(Request $request, $fieldname = 'image' ) {
        if ($request->hasfile($fieldname)) {
            $file = $request->file($fieldname);
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('picture/', $filename);
            // $post->image = $filename;
            return $filename;
        } 
      
    }


}
?>