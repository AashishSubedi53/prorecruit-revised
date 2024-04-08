<x-mail::message>

**First Name:** {{ $details['first_name'] }}  
**Last Name:** {{ $details['last_name'] }}  
**Email:** {{ $details['email'] }}  
**Phone Number:** {{ $details['phone_number'] }} 

**Message:**  
{{ $details['message'] }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
