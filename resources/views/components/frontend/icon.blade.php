@props([
    'name' => '',
    'class' => 'w-5 h-5',
    'color' => 'text-[#c7ad1e]',
])
@svg($name, ['class' => $color . ' ' . $class])
