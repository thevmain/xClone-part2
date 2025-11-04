import LeftSidebar from '@/components/LeftSidebar';
import RightSidebar from '@/components/RightSidebar';
import { type BreadcrumbItem } from '@/types';
import { type ReactNode } from 'react';

interface AppLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default ({ children, breadcrumbs, ...props }: AppLayoutProps) => (
    <div className="flex justify-center">
        <LeftSidebar unreadCount={0} clearUnreadCount={() => {}} />
        <main className="min-h-screen w-full max-w-2xl">{children}</main>
        <RightSidebar />
    </div>
);
