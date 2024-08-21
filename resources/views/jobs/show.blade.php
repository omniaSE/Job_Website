<x-layout>
    <x-slot name="heading">
        Job
    </x-slot>
    <h2 class="font-bold text-lg">{{$job->title}}</h2>
    <p>This Job Pays {{$job->salary}} per Year.</p>
    @can('edit',$job)
      <p class = "mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
      </p> 
    @endcan
</x-layout>