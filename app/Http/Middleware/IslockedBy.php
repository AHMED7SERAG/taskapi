<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\DocumentFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IslockedBy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $documentFile_id = $request->route('file_id'); // Assuming the document ID is passed in the route parameter
        
        // Fetch the document from the database
        $document_file = DocumentFile::find($documentFile_id);

        // Check if the document exists and is locked
        if ($document_file && ($document_file->lockedby_id == null || $document_file->lockedby_id == auth()->user()->id)) {
            // Handle the locked document scenario as needed
            return $next($request);
        } 
        Session::flash('error', __('documentFile.NotLockedByUserMessage'));
        return redirect()->back();

       
    }
}
