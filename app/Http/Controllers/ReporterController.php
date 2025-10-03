<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReporterController extends Controller
{
    public function index()
    {
        $reporters = Reporter::all();
        return view('admin.kelola-reporter.index', compact('reporters'));
    }

    public function create()
    {
        return view('admin.kelola-reporter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:reporters,username',
            'password' => 'required|min:6',
        ]);

        Reporter::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('reporters.index')->with('success', 'Reporter berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $reporter = Reporter::findOrFail($id);
        return view('admin.kelola-reporter.edit', compact('reporter'));
    }

    public function update(Request $request, $id)
    {
        $reporter = Reporter::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:reporters,username,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $reporter->update($data);

        return redirect()->route('reporters.index')->with('success', 'Reporter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $reporter = Reporter::findOrFail($id);
        $reporter->delete();

        return redirect()->route('reporters.index')->with('success', 'Reporter berhasil dihapus!');
    }
}
