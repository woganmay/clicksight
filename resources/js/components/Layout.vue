<script setup>
import { ref } from 'vue'
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot
} from '@headlessui/vue'
import { Bars3Icon, HomeIcon, XMarkIcon, PlusIcon } from '@heroicons/vue/24/outline'
import { usePage, Link, } from "@inertiajs/vue3";

const page = usePage();

const navigation = [
    { name: 'Home', href: '/home', icon: HomeIcon, current: true },
    { name: 'New', href: '#', icon: PlusIcon, current: false },
]

const userNavigation = [
    { name: 'Settings', href: '/settings' }
]

const logout = () => {
    document.getElementById('logout-form').submit();
}

const sidebarOpen = ref(false)
</script>
<template>
    <div>
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog class="relative z-50 lg:hidden font-roboto-regular" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="size-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-2">
                                <div class="flex h-16 shrink-0 items-center">
                                    <img class="h-10 w-auto" src="/assets/clicksight-logo.svg" alt="Clicksight">
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                        <li>
                                            <ul role="list" class="-mx-2 space-y-1">
                                                <li v-for="item in navigation" :key="item.name">
                                                    <a :href="item.href" :class="[item.current ? 'bg-gray-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50 hover:text-orange-600', 'group flex gap-x-3 rounded-md p-2 text-sm/6 font-roboto-regular']">
                                                        <component :is="item.icon" :class="[item.current ? 'text-orange-600' : 'text-gray-400 group-hover:text-orange-600', 'size-6 shrink-0']" aria-hidden="true" />
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="text-xs/6 font-roboto-regular text-gray-400">Recent Dashboards</div>
                                            <ul role="list" class="-mx-2 mt-2 space-y-1">
                                                <li v-for="dashboard in page.props.recent" :key="dashboard.name">
                                                    <a :href="`/dashboard/${dashboard.id}`" :class="[dashboard.current ? 'bg-gray-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50 hover:text-orange-600', 'group flex gap-x-3 rounded-md p-2 text-sm/6 font-roboto-regular']">
                                                        <span :class="[dashboard.current ? 'border-orange-600 text-orange-600' : 'border-gray-200 text-gray-400 group-hover:border-orange-600 group-hover:text-orange-600', 'flex size-6 shrink-0 items-center justify-center rounded-lg border bg-white text-[0.625rem] font-medium']">{{ dashboard.initial }}</span>
                                                        <span class="truncate">{{ dashboard.name }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6">
                <div class="flex h-16 shrink-0 items-end">
                    <img class="h-10 w-auto" src="/assets/clicksight-logo.svg" alt="Clicksight">
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <a :href="item.href" :class="[item.current ? 'bg-gray-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50 hover:text-orange-600', 'group flex gap-x-3 rounded-md p-2 text-sm/6 font-roboto-regular']">
                                        <component :is="item.icon" :class="[item.current ? 'text-orange-600' : 'text-gray-400 group-hover:text-orange-600', 'size-6 shrink-0']" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="text-xs/6 font-roboto-regular text-gray-400">Recent Dashboards</div>
                            <ul role="list" class="-mx-2 mt-2 space-y-1">
                                <li v-for="dashboard in page.props.recent" :key="dashboard.name">
                                    <a :href="`/dashboard/${dashboard.id}`" :class="[dashboard.current ? 'bg-gray-50 text-orange-600' : 'text-gray-700 hover:bg-gray-50 hover:text-orange-600', 'group flex gap-x-3 rounded-md p-2 text-sm/6 font-roboto-regular']">
                                        <span :class="[dashboard.current ? 'border-orange-600 text-orange-600' : 'border-gray-200 text-gray-400 group-hover:border-orange-600 group-hover:text-orange-600', 'flex size-6 shrink-0 items-center justify-center rounded-lg border bg-white text-[0.625rem] font-medium']">{{ dashboard.initial }}</span>
                                        <span class="truncate">{{ dashboard.name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="-mx-6 mt-auto">
                            <Menu as="div" class="relative hover:bg-gray-50">
                                <MenuButton class="w-full">
                                    <div class="flex items-center gap-x-4 px-6 py-3 text-sm/6 font-roboto-regular text-gray-900">
                                        <img class="size-8 rounded-full bg-gray-50" src="/avatar" alt="" />
                                        <span aria-hidden="true">{{ page.props.user.name }}</span>
                                    </div>
                                </MenuButton>
                                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems class="absolute bottom-4 right-4 z-10 mt-2.5 w-32 rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                        <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                                            <Link :href="item.href" :class="[active ? 'bg-gray-50 outline-none' : '', 'block px-3 py-1 text-sm/6 text-gray-900']">{{ item.name }}</Link>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <button @click="logout" :class="[active ? 'bg-gray-50 outline-none' : '', 'block px-3 py-1 text-sm/6 text-gray-900 w-full text-left']">Sign out</button>
                                        </MenuItem>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="sticky top-0 z-40 flex items-center gap-x-6 bg-white px-4 py-4 shadow-sm sm:px-6 lg:hidden">
            <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <Bars3Icon class="size-6" aria-hidden="true" />
            </button>
            <div class="flex-1 text-sm/6 font-roboto-regular text-gray-900">Dashboard</div>
            <a href="#">
                <span class="sr-only">Your profile</span>
                <img class="size-8 rounded-full bg-gray-50" src="/avatar" alt="" />
            </a>
        </div>

        <main class="py-10 lg:pl-72">
            <div class="px-4 sm:px-6 lg:px-8 font-roboto-regular">
                <slot/>
            </div>
        </main>
    </div>
</template>


