<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    /**
     * Tampilkan semua reminder milik user.
     */
    public function index()
    {
        $reminders = Reminder::where('user_id', Auth::id())->get();
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Simpan reminder baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_time' => 'required|date',
        ]);

        Reminder::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'reminder_time' => $request->reminder_time,
        ]);

        return redirect()->back()->with('success', 'Reminder berhasil dibuat!');
    }

    /**
     * Update reminder.
     */
    public function update(Request $request, Reminder $reminder)
    {
        $this->authorize('update', $reminder); // Pastikan user hanya bisa edit miliknya sendiri

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_time' => 'required|date',
        ]);

        $reminder->update($request->all());

        return redirect()->back()->with('success', 'Reminder berhasil diperbarui!');
    }

    /**
     * Hapus reminder.
     */
    public function destroy(Reminder $reminder)
    {
        $this->authorize('delete', $reminder);
        $reminder->delete();

        return redirect()->back()->with('success', 'Reminder berhasil dihapus!');
    }
}
