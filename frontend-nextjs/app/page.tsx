'use client';

export default function Home() {
  return (
    <div className="space-y-8">
      <section className="bg-blue-600 text-white rounded-lg p-8 text-center">
        <h2 className="text-4xl font-bold mb-4">Welcome to Fullstack Assignment</h2>
        <p className="text-lg mb-6">
          A complete fullstack application built with Next.js (Frontend) and CodeIgniter (Backend)
        </p>
        <div className="space-x-4">
          <a
            href="/users"
            className="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 inline-block"
          >
            View Users
          </a>
          <a
            href="/users/create"
            className="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 inline-block"
          >
            Create User
          </a>
        </div>
      </section>

      <section className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div className="bg-white rounded-lg shadow p-6">
          <h3 className="text-xl font-bold mb-3 text-gray-900">Next.js Frontend</h3>
          <p className="text-gray-600">
            Modern React framework with server-side rendering, static generation, and API routes.
          </p>
        </div>
        <div className="bg-white rounded-lg shadow p-6">
          <h3 className="text-xl font-bold mb-3 text-gray-900">CodeIgniter Backend</h3>
          <p className="text-gray-600">
            Powerful PHP framework with built-in security, validation, and database tools.
          </p>
        </div>
        <div className="bg-white rounded-lg shadow p-6">
          <h3 className="text-xl font-bold mb-3 text-gray-900">MySQL Database</h3>
          <p className="text-gray-600">
            Relational database storing all application data with migrations and seeders.
          </p>
        </div>
      </section>

      <section className="bg-white rounded-lg shadow p-8">
        <h3 className="text-2xl font-bold mb-6 text-gray-900">Tech Stack</h3>
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div className="text-center">
            <p className="font-semibold text-gray-900">Frontend</p>
            <p className="text-gray-600">Next.js</p>
            <p className="text-gray-600">React</p>
            <p className="text-gray-600">TypeScript</p>
          </div>
          <div className="text-center">
            <p className="font-semibold text-gray-900">Backend</p>
            <p className="text-gray-600">CodeIgniter</p>
            <p className="text-gray-600">PHP</p>
            <p className="text-gray-600">REST API</p>
          </div>
          <div className="text-center">
            <p className="font-semibold text-gray-900">Database</p>
            <p className="text-gray-600">MySQL</p>
            <p className="text-gray-600">Migrations</p>
            <p className="text-gray-600">Seeds</p>
          </div>
          <div className="text-center">
            <p className="font-semibold text-gray-900">Styling</p>
            <p className="text-gray-600">Tailwind CSS</p>
            <p className="text-gray-600">Responsive</p>
            <p className="text-gray-600">Modern UI</p>
          </div>
        </div>
      </section>
    </div>
  );
}
