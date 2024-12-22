@extends('layout')
@section('title', 'Add new Student')
@section('content')
    {{-- thay ở đây --}}
    <h1 class="text-5xl text-center w-full">Add new student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter student name"
                class="px-2 py-4 rounded-lg border border-black">
        </div>
        <div class="flex flex-col">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter student email"
                class="px-2 py-4 rounded-lg border border-black">
        </div>
        <div class="flex flex-col">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" placeholder="Enter student phone number"
                class="px-2 py-4 rounded-lg border border-black">
        </div>
        <div class="flex flex-col">
            <label for="student_class">Class</label>
            <input type="text" name="student_class" placeholder="Enter student name"
                class="px-2 py-4 rounded-lg border border-black">
        </div>
        <div class="flex flex-col">
            <label for="mark">Mark</label>
            <input type="number" name="mark" placeholder="Enter student Mark"
                class="px-2 py-4 rounded-lg border border-black">
        </div>
        <button type="submit"
            class="bg-blue-500 hover:opacity-80 text-white px-2 py-4 rounded-lg border border-black">Save</button>
    </form>
@endsection
