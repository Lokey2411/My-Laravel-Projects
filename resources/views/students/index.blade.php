@extends('layout')
@section('title', 'Students List')
@section('content')
    <h1>Students list</h1>
    <a href="{{ route('students.create') }}" class="bg-blue-500 hover:opacity-80 text-white px-2 py-4 rounded-lg">Add
        student</a>
    <table>
        <thead>
            <tr>
                {{-- Thay ở đây --}}
                <th>#</th>
                <th>Student Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Class</th>
                <th>Mark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
                <tr>
                    {{-- Thay ở đây --}}
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->student_class }}</td>
                    <td>{{ $student->mark }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="bg-blue-500 hover:opacity-80 text-white px-2 py-4 rounded-lg">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 hover:opacity-80 text-white px-2 py-4 rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
@endsection
