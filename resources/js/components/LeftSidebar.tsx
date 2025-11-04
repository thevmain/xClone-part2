import { User as UserType } from '@/types';
import {
    AiSearch02Icon,
    AllBookmarkIcon,
    HomeIcon,
    Message01Icon,
    MoreHorizontalFreeIcons,
    Notification01Icon,
    UserMultiple02Icon,
} from '@hugeicons/core-free-icons';
import { HugeiconsIcon } from '@hugeicons/react';
import { usePage } from '@inertiajs/react';

import { LogOut, UserIcon } from 'lucide-react';
import NavItem from './NavItem';
import { Avatar, AvatarFallback, AvatarImage } from './ui/avatar';
import { Button } from './ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from './ui/dropdown-menu';

interface LeftSidebarProps {
    unreadCount: number;
    clearUnreadCount: () => void;
}

const LeftSidebar = ({ unreadCount, clearUnreadCount }: LeftSidebarProps) => {
    const { url, props } = usePage<{ auth: { user: UserType } }>();

    return (
        <aside className="sticky top-0 h-screen w-64 p-4">
            <div className="flex h-full flex-col justify-between">
                <div>
                    <div className="mb-4 pl-3 text-2xl font-bold text-blue-500">
                        <img src="/images/zephyr.png" alt="logo" />
                    </div>
                    <nav className="space-y-2">
                        <NavItem
                            href="/dashboard"
                            active={url === 'dashboard'}
                            icon={
                                <HugeiconsIcon
                                    icon={HomeIcon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Home
                        </NavItem>
                        <NavItem
                            href="/explore"
                            active={url === 'explore'}
                            icon={
                                <HugeiconsIcon
                                    icon={AiSearch02Icon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Explore
                        </NavItem>
                        <NavItem
                            href="/notifications"
                            active={url === 'notifications'}
                            icon={
                                <HugeiconsIcon
                                    icon={Notification01Icon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Notification
                        </NavItem>
                        <NavItem
                            href="/messages"
                            active={url === 'messages'}
                            icon={
                                <HugeiconsIcon
                                    icon={Message01Icon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Notification
                        </NavItem>
                        <NavItem
                            href="/bookmarks"
                            active={url === 'bookmarks'}
                            icon={
                                <HugeiconsIcon
                                    icon={AllBookmarkIcon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Bookmarks
                        </NavItem>
                        <NavItem
                            href="/communities"
                            active={url === 'communities'}
                            icon={
                                <HugeiconsIcon
                                    icon={UserMultiple02Icon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Communities
                        </NavItem>
                        <NavItem
                            href="/profile"
                            active={url === 'profile'}
                            icon={
                                <HugeiconsIcon
                                    icon={UserMultiple02Icon}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            Profile
                        </NavItem>
                        <NavItem
                            href="/more"
                            active={url === 'more'}
                            icon={
                                <HugeiconsIcon
                                    icon={MoreHorizontalFreeIcons}
                                    size={24}
                                    color="currentColor"
                                />
                            }
                        >
                            More
                        </NavItem>
                    </nav>
                    <Button className="mt-8 w-full rounded-full bg-blue-500 text-white hover:bg-blue-600">
                        Post
                    </Button>
                </div>

                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <button className="mx-auto flex w-full items-center gap-3 rounded-full p-3 transition-colors hover:bg-muted">
                            <Avatar className="h-10 w-10">
                                <AvatarImage src="" alt="" />
                                <AvatarFallback>AR</AvatarFallback>
                            </Avatar>
                            <div className="flex-1 text-left">
                                <p className="text-sm font-bold">
                                    Ardiman here
                                </p>
                                <p className="text-xs text-muted-foreground">
                                    @username
                                </p>
                            </div>
                        </button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" className="w-56">
                        <DropdownMenuItem>
                            <UserIcon className="mr-2 h-4 w-4" />
                            <span>Profile</span>
                        </DropdownMenuItem>
                        <DropdownMenuSeparator />
                        <DropdownMenuItem>
                            <LogOut className="mr-2 h-4 w-4" />
                            <span>Log out @username</span>
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
        </aside>
    );
};

export default LeftSidebar;
