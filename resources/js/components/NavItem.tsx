import { cn } from '@/lib/utils';
import { Link } from '@inertiajs/react';
import { ReactNode } from 'react';

interface NavItemProps {
    href: string;
    active: boolean;
    icon: ReactNode;
    children: ReactNode;
    onClick?: () => void;
}

const NavItem = ({ href, active, icon, children, onClick }: NavItemProps) => {
    return (
        <Link
            href={href}
            onClick={onClick}
            className={cn(
                'flex items-center gap-4 rounded-full px-4 py-3 text-xl transition-colors',
                active
                    ? 'bg-primary/10 font-bold'
                    : 'font-normal hover:bg-muted',
            )}
        >
            {icon}
            <span>{children}</span>
        </Link>
    );
};

export default NavItem;
