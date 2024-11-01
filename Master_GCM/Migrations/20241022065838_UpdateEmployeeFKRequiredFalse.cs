using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class UpdateEmployeeFKRequiredFalse : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_ASSET_MST_EMPLOYEE_NIPP",
                table: "TRN_HIST_ASSET");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_ASSET_MST_EMPLOYEE_NIPP",
                table: "TRN_HIST_ASSET",
                column: "NIPP",
                principalTable: "MST_EMPLOYEE",
                principalColumn: "NIPP");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_TRN_HIST_ASSET_MST_EMPLOYEE_NIPP",
                table: "TRN_HIST_ASSET");

            migrationBuilder.AddForeignKey(
                name: "FK_TRN_HIST_ASSET_MST_EMPLOYEE_NIPP",
                table: "TRN_HIST_ASSET",
                column: "NIPP",
                principalTable: "MST_EMPLOYEE",
                principalColumn: "NIPP",
                onDelete: ReferentialAction.Cascade);
        }
    }
}
