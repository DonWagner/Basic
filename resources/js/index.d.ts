import type { Config } from 'ziggy-js';
import type { LucideIcon } from 'lucide-react';

export interface BreadcrumbItem {
  title: string;
  href: string;
}

export interface NavGroup {
  title: string;
  items: NavItem[];
}

export interface NavItem {
  title: string;
  href: string;
  icon?: LucideIcon | null;
  isActive?: boolean;
}

export interface SharedData {
  name: string;
  quote: { message: string; author: string };
  auth: Auth;
  ziggy: Config & { location: string };
  sidebarOpen: boolean;
  [key: string]: unknown;
}

interface Auth {
  user: {
    id: number;
    name: string;
    email: string;
  } | null;
  roles: string[];
}

// 👇 Dette er det vigtige Inertia-hack:
declare module '@inertiajs/react' {
  interface PageProps extends SharedData {}
}
