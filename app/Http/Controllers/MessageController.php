<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MongoDB\Client;
use MongoDB\Client as MongoClient;
use MongoDB\BSON\ObjectId;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
    // public function sendDocument(Request $request)
// {
//     try {
//         $request->validate([
//             'from' => 'required|string',
//             'to' => 'required|string',
//             'document' => 'required|file|mimes:pdf,xlsx,xls|max:2048',
//         ]);

//         $file = $request->file('document');
//         $client = new Client("mongodb://localhost:27017");
//         $database = $client->chatbot_db;
//         $bucket = $database->selectGridFSBucket();

//         // Store document in GridFS
//         $stream = fopen($file->getPathname(), 'rb');
//         $fileId = $bucket->uploadFromStream($file->getClientOriginalName(), $stream, [
//             'metadata' => [
//                 'mimeType' => $file->getMimeType(),
//                 'filename' => $file->getClientOriginalName(),
//             ]
//         ]);
//         fclose($stream);

//         // Save message in MongoDB
//         $message = Message::create([
//             'from' => $request->input('from'),
//             'to' => $request->input('to'),
//             'message' => 'Document sent: ' . $file->getClientOriginalName(),
//             'timestamp' => now(),
//             'document_id' => (string) $fileId,  // Convert ObjectId to string
//         ]);

//         return response()->json([
//             'message' => $message,
//             'document_id' => (string) $fileId,
//         ]);
//     } catch (\Exception $e) {
//         \Log::error('Error sending document: ' . $e->getMessage());
//         return response()->json(['error' => 'An error occurred while sending the document.'], 500);
//     }
// }

public function download($documentId)
{
    try {
        // Connect to MongoDB
        $client = new MongoClient;
        $database = $client->chatbot_db;  // Replace with your actual database name
        $bucket = $database->selectGridFSBucket();

        // Fetch the file from GridFS by the document ID (documentId)
        $file = $bucket->findOne(['_id' => new ObjectId($documentId)]);

        if (!$file) {
            \Log::error("File not found in GridFS with documentId: $documentId");
            return abort(404, 'Document not found');
        }

        // Create a temporary stream to serve the file
        $stream = $bucket->openDownloadStream($file->_id);

        // Set the correct headers to trigger file download
        return Response::stream(function() use ($stream) {
            fpassthru($stream);
        }, 200, [
            "Content-Type" => $file->metadata['mimeType'],
            "Content-Disposition" => "attachment; filename={$file->metadata['filename']}",
        ]);
    } catch (\Exception $e) {
        \Log::error('Error downloading document: ' . $e->getMessage());
        return abort(500, 'Error downloading document');
    }
}

public function view($documentId)
    {
        try {
            // Connect to MongoDB
            $client = new MongoClient;
            $database = $client->chatbot_db;  // Replace with your actual database name
            $bucket = $database->selectGridFSBucket();

            // Fetch the file from GridFS
            $file = $bucket->findOne(['_id' => new ObjectId($documentId)]);

            if (!$file) {
                \Log::error("File not found in GridFS with documentId: $documentId");
                return abort(404, 'Document not found');
            }

            // Open a stream for the file
            $stream = $bucket->openDownloadStream($file->_id);

            // Return the file as a response for inline viewing
            return response()->stream(
                function () use ($stream) {
                    fpassthru($stream);
                },
                200,
                [
                    "Content-Type" => $file->metadata['mimeType'],
                    "Content-Disposition" => "inline; filename={$file->metadata['filename']}",
                ]
            );
        } catch (\Exception $e) {
            \Log::error('Error viewing document: ' . $e->getMessage());
            return abort(500, 'Error viewing document');
        }
    }
}
