import FollowItem from './FollowItem';

const RightSidebar = () => {
    return (
        <aside className="sticky top-0 h-screen w-72 p-4">
            <input
                type="text"
                name="search"
                id="search"
                placeholder="Search"
                className="text-xm mb-4 w-full rounded-full bg-gray-50 px-4 py-2 focus:outline-none"
            />
            <div className="rounded-2xl bg-gray-50 p-4 shadow">
                <h2 className="mb-3 text-lg font-bold">What's happening</h2>
                <ul className="space-y-2 text-sm text-gray-600">
                    <li>#AI</li>
                    <li>#Programming</li>
                    <li>#Vibecoding</li>
                </ul>
                <button className="mt-3 text-blue-500 hover:underline">
                    Show more
                </button>
            </div>

            <div className="mt-4 rounded-2xl bg-gray-50 p-4 shadow">
                <h2 className="mb-3 text-lg font-bold">Who to follow</h2>
                <div className="space-y-3 text-sm">
                    <FollowItem name="GraphQL" username="@graphQL" />
                    <FollowItem name="Larajobs" username="@laraveljobs" />
                    <FollowItem name="Laracon EU" username="@laraconEU" />
                </div>
            </div>
        </aside>
    );
};

export default RightSidebar;
