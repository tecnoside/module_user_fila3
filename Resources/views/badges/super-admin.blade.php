<<<<<<< HEAD
@if (isset($_profile) && $_profile->isSuperAdmin())
=======
@if(isset($_profile) && $_profile->isSuperAdmin())
>>>>>>> 3296a30 (up)
   <x-filament::icon-button
    icon="fas-chess-king"
    class="h-5 w-5 text-gray-500 dark:text-gray-400"
    tooltip="Super Admin"
    />
@endif