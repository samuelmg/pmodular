<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->archivo->isValid()) {
            $nombreHash = $request->archivo->store('');
            Archivo::create([
                'modelo_id' => $request->modelo_id,
                'modelo_type' => $request->modelo_type,
                'original' => $request->archivo->getClientOriginalName(),
                'hash' => $nombreHash,
                'mime' => $request->archivo->getClientMimeType(),
                'tamaño' => $request->archivo->getClientSize(),
            ]);
        }

        return redirect()->back();
    }

    public function download(Archivo $archivo)
    {
        $rutaArchivo = storage_path('app/' . $archivo->hash);
        return response()->download($rutaArchivo, $archivo->original, ['Content-Type' => $archivo->mime]);
    }

    public function delete(Archivo $archivo)
    {
        $rutaArchivo = storage_path($archivo->hash);

        if (\Storage::exists($archivo->hash)) {
            \Storage::delete($archivo->hash);
            $archivo->delete();
        }

        return redirect()->back();
    }
}
