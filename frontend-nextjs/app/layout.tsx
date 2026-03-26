import type { Metadata } from 'next';
import './globals.css';

export const metadata: Metadata = {
  title: 'Fullstack Assignment',
  description: 'A fullstack web application with Next.js and CodeIgniter',
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="en">
      <body className="bg-gray-50">
        <nav className="bg-white shadow">
          <div className="container mx-auto px-4 py-4">
            <div className="flex justify-between items-center">
              <h1 className="text-2xl font-bold text-gray-900">Fullstack App</h1>
              <ul className="flex space-x-6">
                <li>
                  <a href="/" className="text-gray-700 hover:text-blue-600">
                    Home
                  </a>
                </li>
                <li>
                  <a href="/users" className="text-gray-700 hover:text-blue-600">
                    Users
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <main className="container mx-auto px-4 py-8">
          {children}
        </main>
        <footer className="bg-gray-900 text-white text-center py-4 mt-8">
          <p>&copy; 2024 Fullstack Assignment. All rights reserved.</p>
        </footer>
      </body>
    </html>
  );
}
